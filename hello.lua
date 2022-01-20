-- local pgmoon = require("pgmoon")
ngx.say("Hello <b>LUA</b><br/>")
ngx.say("Url: ")
local arg = ngx.var.uri
ngx.say(arg)