const http = require('http');
http.get('http://localhost/munaa_krishi/products', res => {
  let data = '';
  res.on('data', chunk => data += chunk);
  res.on('end', () => {
    const lines = data.split('\n').filter(l => l.includes('data-category'));
    console.log(lines.join('\n'));
  });
});
