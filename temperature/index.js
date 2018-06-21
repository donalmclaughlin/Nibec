var mac;
var temp;
// var humid;
// var payload;

console.log('Loading');

exports.handler = function (event, context, callback) {

    if (event !== null) 
    {
        console.log('event = ' + JSON.stringify(event));
        mac = event.MAC;
        temp = event.Temp;
      //  humid = event.Humid;
    }
    else 
    {
        console.log('No event object');
    }
    var mysql = require('mysql');
    var connection = mysql.createConnection({
        host: 'database1.cilnxsic6nbr.eu-west-1.rds.amazonaws.com',
        user: 'Nibec2018',
        password: 'Nibec2018',
        database: 'database1'
    });
    connection.connect();

    var qry = "INSERT INTO Temperature (deviceId, temperature) VALUES ('" + mac + "','" + temp + "');"
    console.log(qry);
    connection.query(qry, function (err, rows, fields) {
        if (!err) 
        {
            console.log('Return is: ', JSON.stringify(rows));
            output = JSON.stringify(rows);
            context.done(null, 'Log Node Successful');  // SUCCESS with message
            callback(null, output);
        }
        else
            console.log('Error while performing Query.');
        context.done("err", "query failure");
    });

    connection.end();
    
};