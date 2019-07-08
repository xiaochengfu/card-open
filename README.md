# 脉微名片开放接口

### 每日海报API接口

公司的一个项目，需要每天为用户推送一张海报，而且还要根据节气、实时热点每日变化，需要精心挑选，但是搜了一遍，并没有发现这样的api，很是头疼，但是这个需求还得实现，没办法，只能专人去维护，目前已经维护了近100天了，之后还会一直运营下去，所以想把此接口开放，希望能帮到有需要的朋友！

> 效果展示：每日更新并推送

<img src="https://cdn.xiaochengfu.com/mumber/smallapp/poster-list.jpg" width=60% height=60%/>

也可以微信扫码体验：

<img src="https://cdn.xiaochengfu.com/mumber/smallapp/small-wmmp.png" width=30% height=30%/>

Api接口通过get请求即可获取：

<img src="https://cdn.xiaochengfu.com/mumber/smallapp/api-poster.png" width=80% height=50%/>

> 加密方式:

url加密采用appKey和appSecret，目前只提供了go和php两种语言的sdk，appKey和appSercet的获取方式，关注下面的公众号，点击右下角『我的』-『我的密钥』即可获取！

<img src="https://cdn.xiaochengfu.com/mumber/smallapp/mvQrCode.jpg" width=30% height=30%/>

### [加密sdk文档](poster/api-sdk.md)

#### go-sdk

[1.go-sdk](poster/go-sdk)

[2.php-sdk](poster/php-sdk)