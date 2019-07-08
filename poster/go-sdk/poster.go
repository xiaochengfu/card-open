package main

import (
	"crypto/md5"
	"crypto/rand"
	"encoding/base64"
	"fmt"
	"io"
	"io/ioutil"
	"net/http"
	"sort"
)

func main() {
	config := map[string]string{
		"appKey":    "这里换成您的 appKey",
		"appSecret": "这里换成您的 appSecret",
	}
	params := map[string]string{
		"page":     "1",
		"limit":    "10",
		"nonceStr": Md5(UniqueId()),
	}
	sign := SignValidate(params, config)
	for k, v := range config {
		if k == "appSecret" {
			continue
		}
		params[k] = v
	}
	var query string
	for i, j := range params {
		query += i + "=" + j + "&"
	}
	//添加签名
	query = query + "signature=" + sign
	url := "https://open.xiaochengfu.cn/api/card/poster?" + query
	fmt.Println(url)
	resp, err := http.Get(url)
	if err != nil {
		// handle error
	}
	defer resp.Body.Close()
	body, err := ioutil.ReadAll(resp.Body)

	if err != nil {
		// handle error
	}

	fmt.Println(string(body))
}

func SignValidate(params map[string]string, config map[string]string) (sign string) {
	var keys []string
	for k := range params {
		keys = append(keys, k)
	}
	sort.Strings(keys)
	var dataParams string
	for _, k := range keys {
		//参数为空的不参与签名
		if k == "signature" || params[k] == "" || k == "appKey" {
			continue
		} else {
			dataParams = dataParams + k + "=" + params[k] + "&"
		}
	}
	//去掉最后一个&
	dataParams = dataParams[0 : len(dataParams)-1]
	//拼接secret
	dataParams = dataParams + "&appSecret" + "=" + config["appSecret"]
	//md5加密
	return Md5(dataParams)
}

func Md5(str string) string {
	hash := md5.New()
	hash.Write([]byte(str))
	return fmt.Sprintf("%x", hash.Sum(nil))
}

func UniqueId() string {
	b := make([]byte, 48)

	if _, err := io.ReadFull(rand.Reader, b); err != nil {
		return ""
	}
	return Md5(base64.URLEncoding.EncodeToString(b))
}
