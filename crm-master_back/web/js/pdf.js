var fs = require('fs');
var pdf = require('html-pdf');
var html = fs.readFileSync('http://crm.local/reports/main/report?id=K7wolLiO9bf', 'utf8');
var options = { format: 'Letter' };

pdf.create(html, options).toFile('../uploads/example.pdf', function(err, res) {
  if (err) return console.log(err);
  console.log(res); // { filename: '/app/businesscard.pdf' }
});
phantom.exit();