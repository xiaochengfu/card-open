**简要描述：** 

- 每日海报api

**请求URL：** 
- ` https://open.xiaochengfu.cn/api/card/poster`
  
**请求方式：**
- GET

**参数：** 
|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|page|是	|string|	第几页
|limit|是|array	| 每页取几条
|nonceStr|是	|string|	随机字符串32位
|appKey|是	|string|	联系脉微名片客服获取appkey,不参与签名
|signature|是	|string|	签名(字母小写)

**请求参数示例：**
```
https://open.xiaochengfu.cn/api/card/poster?page=1&limit=10&nonceStr=随机字符串&signature=签名&appKey=应用key
}

```


 **返回示例**
> 成功

```json
{
    "code": 0,
    "data": {
        "count": 87,
        "list": [
            {
                "create_time": 1561564801,
                "id": 137,
                "image_url": "https://cdn.xiaochengfu.com//mumber/share-card/20190623/2246a2a2632aa40954ab88ccd34702e4.jpg",
                "title": "为梦想奔跑吧"
            },
            {
                "create_time": 1561478401,
                "id": 136,
                "image_url": "https://cdn.xiaochengfu.com//mumber/share-card/20190621/85b8115498b2a89a82b276357e1194be.jpg",
                "title": "选中了方向，一直往前走"
            }
        ]
    },
    "msg": "success"
}
```
> 失败

```json
{
    "code": 500,
    "data": null,
    "msg": "签名错误"
}
```

 **备注** 
> 签名【signature】生成规则

```
第一步，把所有发送的数据为集合M，将集合M内非空参数值的参数按照参数名ASCII码从小到大排序（字典序），使用URL键值对的格式（即key1=value1&key2=value2…）拼接成字符串stringA。

特别注意以下重要规则：

◆ 参数名ASCII码从小到大排序（字典序）；
◆ 如果参数的值为空不参与签名；
◆ 参数名区分大小写；
◆ 参数appKey不参与签名，appSecret参与签名
◆ 传送的signature参数不参与签名，将生成的签名与该signature值作校验。

第二步，在stringA最后拼接上key得到stringSignTemp字符串，并对stringSignTemp进行MD5运算，得到signature值signatureValue。

◆ appKey和appSecret的值,由脉微名片官方提供，请联系客服获取
```


>举例：

假设传送的参数如下:

```shell
  page: 1
  limit: 10
  nonceStr:    gGpjRqm8NwsVInvilUe9dLyc35HXASrF
  appKey:  6BwYfhkaJ9cy
  signature:    4f3257a5fe746d2c38bc76f3ef6854a4
```
第一步：对参数按照key=value的格式，并按照参数名ASCII字典序排序如下：

```
stringA="limit=10&nonceStr=gGpjRqm8NwsVInvilUe9dLyc35HXASrF&page=1"
```

第二步：拼接appSecret后：

```
stringSignTemp="limit=10&nonceStr=gGpjRqm8NwsVInvilUe9dLyc35HXASrF&page=1&appSecret=Et71aqXsir4G0RWYJbZBxkQ5AwugOeM3"
```

第三步：md5加密

```
"signature":"71604ef9d28ec99ffd1e9ac1642f14b8"
```


> 最终要发送的数据如下：

```
https://open.xiaochengfu.cn/api/card/poster?page=1&limit=10&nonceStr=gGpjRqm8NwsVInvilUe9dLyc35HXASrF&appKey=6BwYfhkaJ9cy&signature=4f3257a5fe746d2c38bc76f3ef6854a4
```
