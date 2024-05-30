const cors = require("cors");
const express = require("express");
const app = express();

app.use(cors());

app.get("/", (req, res) => {
	res.json({ data: "hello world" });
});

app.get("/:id", (req, res) => {
	const id = req.params.id;
	res.json({ data: "hello world" });
});

app.get("/", (req, res) => {
	res.json({ data: "hello world" });
});
