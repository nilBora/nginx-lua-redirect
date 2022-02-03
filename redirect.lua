            local redis_host = os.getenv("APP_REDIS_HOST")
            local redis_port = os.getenv("APP_REDIS_PORT")

            local redis = require "resty.redis"
            --local cjson = require("cjson")
            --local json = require("json")

            local red = redis:new()
            local arg = ngx.var.uri

            local uri, _ = arg:gsub("/", "")

            red:set_timeout(1000)

            local ok, err = red:connect(redis_host, redis_port)

            if not ok then
                 local res = ngx.location.capture ("/index.php", {args = {uri = ngx.var.uri, args = ngx.var.args}})
                 ngx.say(res.body)
            end

            res, err = red:get("redirect:" .. uri);
            if res == ngx.null then
                local res = ngx.location.capture ("/index.php", {args = {uri = ngx.var.uri, args = ngx.var.args}})
                ngx.say(res.body)
            else
                local values = { 'value1', 'value2', 'value3' }
                red:rpush('visits', ngx.var.uri)
                ngx.say(res)
            end