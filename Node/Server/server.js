// importing modules
const express = require("express");
const cors = require("cors");

// import database connection
const db = require("./database");

// port number
const PORT = 5000;

// create an express server
const app = express();

// middlewares to work with react and postman requests
app.use(cors());
app.use(express.json());

// get all products
app.get("/products", (req, res) => {
	// SELECT all data from the database
	db.query("SELECT * FROM `products`", (error, data) => {
		// check for errors
		if (error) {
			// return errors if any
			return res.status(500).json({ error });
		}
		return res.json({ products: data }); // data contains rows returned by server
	});
});

// get single product by id
app.get("/products/:id", (req, res) => {
	// get the product's id from the url
	const id = req.params.id;
	// SELECT the data from the database
	db.query("SELECT * FROM `products` WHERE `id` = ?", id, (error, data) => {
		// check for errors
		if (error) {
			// return errors if any
			return res.status(404).json({ error: "Product was not found" });
		}
		return res.json({ product: data }); // data contains rows returned by server
	});
});

// Insert new product
app.post("/products", (req, res) => {
	// get the data from the request body
	const { name, price, description } = req.body;

	// validate the input data
	if (!name || !price || !description) {
		return res.status(400).json({
			error: "name, price and description are required",
		});
	}

	// store them in a variable
	const body = [name, price, description];

	// query to insert data
	const query = `INSERT INTO products (name, price, description) VALUES (?, ?, ?)`;

	// Insert new product to the database
	db.query(query, body, (error, data) => {
		// check for errors
		if (error) {
			// return errors if any
			return res.status(400).json({ error });
		}
		// success response
		return res.json({
			message: "Product created successfully",
			data,
		}); // data contains rows returned by server
	});
});

// Update product's data
app.put("/products/:id", (req, res) => {
	// get the product's id from the url
	const id = req.params.id;

	// get the data from the request body
	const { name, price, description } = req.body;

	// validate the input data
	if (!name || !price || !description) {
		return res.status(400).json({
			error: "name, price and description are required",
		});
	}

	// store them in a variable
	const body = [name, price, description, id];

	// query to update product data
	const query =
		"UPDATE `products` SET `name` = ?,`price` = ?,`description` = ? WHERE `id` = ?";

	// update the product in the database
	db.query(query, body, (error, data) => {
		// check for errors
		if (error) {
			// return errors if any
			return res.status(404).json({ error: "product was not found" });
		}

		// success response
		return res.json({
			message: "Product updated successfully",
		}); // data contains rows returned by server
	});
});

// Delete a product
app.delete("/products/:id", (req, res) => {
	// get the product's id from the url
	const id = req.params.id;

	// Insert new product to the database
	db.query("DELETE FROM `products` WHERE `id` = ?", id, (error, result) => {
		// check for errors
		if (error) {
			// return errors if any
			return res.status(404).json({ error });
		}

		// check for results
		if (result.affectedRows === 0) {
			// No rows affected means no product was found with the given ID
			return res.status(404).json({ error: "Product was not found" });
		}

		// success response
		return res.json({
			message: "Product deleted successfully",
		}); // product deleted successfully
	});
});

app.listen(PORT, () => {
	console.log(`Server is running on http://localhost:${PORT}`);
});

// DO NOT EDIT BELOW THIS LINE, IT'S FOR TESTING ONLY

app.post("/seed", (req, res) => {
	const query = `INSERT INTO products (name, price, description) VALUES
('Security Pro Camera', 149.99, 'High-resolution indoor/outdoor security camera with night vision.'),
('SafeHome Alarm System', 199.99, 'Wireless home alarm system with mobile alerts.'),
('Guardian Smoke Detector', 29.99, 'Smart smoke and carbon monoxide detector with real-time notifications.'),
('Vision Doorbell', 99.99, 'Video doorbell with 1080p HD video and two-way audio.'),
('Intruder Alert Sensor', 49.99, 'Motion sensor with pet-friendly settings and mobile integration.'),
('Window Shield', 39.99, 'Break-in resistant window film with UV protection.'),
('Digital Safe', 89.99, 'Electronic safe with keypad entry and emergency override key.'),
('Floodlight Cam', 129.99, 'Outdoor security camera with built-in floodlights and siren.'),
('Smart Lock', 109.99, 'Keyless entry lock with remote access and activity log.'),
('Driveway Monitor', 59.99, 'Wireless driveway alarm with adjustable range and sensitivity.')
`;
	// SELECT all data from the database
	db.query(query, (error, data) => {
		if (!error) {
			return res.json({ message: "seeded successfully" }); // data contains rows returned by server
		}
		// return errors if any
		return res.status(500).json({ error });
	});
});
