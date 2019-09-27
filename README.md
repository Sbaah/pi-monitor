[![StyleCI](https://github.styleci.io/repos/197078264/shield?branch=master)](https://github.styleci.io/repos/197078264)

# pi-monitor

An example client for the [py-monitor-api](https://github.com/cversyx/py-monitor-api)

## Installation

```bash
composer create-project raekw0n/pi-monitor
cp config/.env.example config/.env
```

## Development

To enable testing for development purposes, simply set `DEBUG=true` in your `config/.env`, this will then load the json test data contained within `tests/`, rather than calling the API.


![image](https://i.imgur.com/sWoKUfH.png)

## License
pi-monitor is open-sourced software licensed under the MIT license.
