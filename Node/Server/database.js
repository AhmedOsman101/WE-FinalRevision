// Get the client
const mysql = require("mysql2");

// Create the connection to database
const db = mysql.createConnection({
	host: "localhost",
	user: "root",
	database: "final_revision",
	password: "",
});

module.exports = db;
