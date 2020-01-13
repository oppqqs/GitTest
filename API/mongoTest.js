// 先宣告用的到的東西
var MongoClient = require('mongodb').MongoClient,
    Server = require('mongodb').Server,
    options = { auto_reconnection: true, poolSize: 10 };

// Server 設定
var mongoClient = new MongoClient(new Server('localhost', 27017, options));

// 開啟連線
mongoClient.connect(function(err, mongoClient) {
    var db1 = mongoClient.db("testDB");

    if (!err) {
        console.log("Connected!");
    }

    mongoClient.close();
    console.log("Closed!");
});