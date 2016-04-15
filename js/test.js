var dns = require('dns');

dns.lookup('www.baidu.com', function onLookup(err, addresses, family) {
      console.log('addresses:', addresses);
});
