<?php


namespace thans\filesystem\driver;

use Aws\S3\S3Client;
use League\Flysystem\AdapterInterface;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use think\filesystem\Driver;

class S3 extends Driver {

    protected function createAdapter(): AdapterInterface {
        // TODO: Implement createAdapter() method.
        $client = new S3Client([
            'credentials'             => [
                'key'    => $this->config['key'],
                'secret' => $this->config['secret']
            ],
            'region'                  => $this->config['region'],
            'version'                 => 'latest',
            'endpoint'                => $this->config['endpoint'],
            'use_path_style_endpoint' => true,
        ]);
        return new AwsS3Adapter($client, $this->config['bucket']);
    }
}