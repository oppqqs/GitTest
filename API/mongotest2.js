var mongoClient = require('mongodb').MongoClient;
// useNewUrlParser: true,
mongoClient.connect('mongodb://localhost:27017/', { useUnifiedTopology: true }, function(err, mongoclient) {
    if (err) {
        console.error('An error occurred connecting to MongoDB: ', err);
    } else {
        // Data
        var todo1 = { todo: "Buy books", time: "2014/10/11", who: "myself" };
        var todo2 = { todo: "Buy milk", time: "2014/10/15", who: "brother" };
        var todo3 = { todo: "Wash cats", time: "2014/11/21", who: "myself" };
        var db = mongoclient.db("testDB");
        var dbcollection = db.collection('todoTest');
        var where = { todo: "Buy milk" };

        // 新增資料
        dbcollection.insert(todo1, function(err, docs) {
            console.log(docs);
        });

        dbcollection.insert(todo2, function(err, docs) {
            console.log(docs);
        });

        dbcollection.insert(todo3, function(err, docs) {
            console.log(docs);
        });

        // 更新資料
        dbcollection.update(where, { $set: { time: "2014/12/25" } }, function(err) {
            console.log(err);
        });

        // 刪除某筆資料
        dbcollection.remove(where, function(err) {
            console.log(err);
        });

        // 查詢某筆資料
        dbcollection.find(where).toArray(function(err, results) {
            console.dir(results);
        });

        // 查詢所有資料
        dbcollection.find().toArray(function(err, results) {
            console.dir(results);
        });
    }
});