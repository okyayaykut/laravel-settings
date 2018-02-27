<?php

namespace okyayaykut\LaravelConfig;

use Illuminate\Foundation\Application;
use File;

class LaravelConfig
{
    /**
     * Store all data.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Package Config.
     *
     * @var array
     */
    protected $config;

    public function __construct(Application $app)
    {
        $this->config = $app->config->get("settings");
        if(File::exists($this->config['file']) === false)
            $this->save();
        $this->data = json_decode(File::get($this->config['file']), true);
    }

    public function setData($data)
    {
        $this->data = $data;
        $this->save();
        return $this;
    }

    public function get($key, $default = false)
    {
        if($this->has($key)) {
            return array_get($this->data, $key, $default);
        }else {
            return $default;
        }
    }

    public function has($key)
    {
        return array_has($this->data, $key);
    }

    public function set($keys, $value = null){
        if(is_array($keys)){
            foreach($keys as $key => $keyValue) {
                $this->data[$key] = $keyValue;
            }
        } else {
            $this->data[$keys] = $value;
        }
        $this->save();
        return $this;
    }

    public function remove($keys)
    {
        array_forget($this->data, $keys);

        return $this;
    }

    public function all()
    {
        return $this->data;
    }

    public function clean()
    {
        $this->data = [];
        $this->save();
        return $this;
    }

    public function save()
    {
        File::put($this->config['file'], $this->json($this->data));

        return $this;
    }

    protected function json($data)
    {
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES);
    }
}