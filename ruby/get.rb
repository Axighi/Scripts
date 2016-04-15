require 'net/http'

uri = URI('https://api.douban.com/v2/book/search?q=hello')
res = Net::HTTP.get(uri) # => String
puts res 
