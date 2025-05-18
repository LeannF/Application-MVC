const express = require('express');
const cors = require('cosr');

const app = express();
app.use(express.json())

app.listen(5000);

module.exports = app;