var ws = new WebSocket("ws://raspberry-api.local/network/counter/lo");

ws.onopen = function() {
    alert("Sconn is open");
};

ws.onmessage = function(incoming) {
    console.log(incoming);
};

ws.onclose = function() {
    alert("Sconn is closed...");
};