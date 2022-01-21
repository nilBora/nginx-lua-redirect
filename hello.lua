local redis = require "resty.redis"
local red = redis:new()

red:set_timeout(1000)

local ok, err = red:connect("redis_redirect", 6379)

if not ok then
    ngx.say("Error: ")
    ngx.say(err)
    --ngx.exec(path)
end
red:set("ping", "PONG!")
res, err = red:get("ping");

ngx.say(res)

ngx.say("Url: ")
local arg = ngx.var.uri
ngx.say(arg)