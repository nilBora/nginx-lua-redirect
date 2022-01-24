local redis = require "resty.redis"
local red = redis:new()
local arg = ngx.var.uri

local uri, _ = arg:gsub("/", "")

red:set_timeout(1000)

local ok, err = red:connect("redis_redirect", 6379)

if not ok then
    ngx.say("Error: ")
    ngx.say(err)
    --ngx.exec(path)
end

res, err = red:get("redirect:" .. uri);
if res == ngx.null then
    ngx.say("Not Found")
    --ngx.exec(path) -- если данных нет, то сделаем редирект
else
    ngx.say("FOUND!")
   -- ngx.exec(res)
end

