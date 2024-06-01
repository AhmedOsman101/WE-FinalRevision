import { useEffect, useState } from "react";
import axios from "axios";
import Row from "../components/Row";
import Seed from "../components/Seed";
import { Link } from "react-router-dom";

const AllProducts = () => {
	// State to store the products
	const [products, setProducts] = useState();

	// Function to fetch products data from the server
	const fetchData = async () => {
		try {
			// Fetch products data from the server
			const result = await axios.get(`http://localhost:5000/products`);
			// Return the products data
			return result.data.products;
		} catch (error) {
			// Log error if fetching data fails
			console.error("Error fetching data: ", error);
			// Return an empty array in case of error
			return [];
		}
	};

	// useEffect hook to fetch products data on component mount
	useEffect(() => {
		// Function to get products data and set state
		const getProducts = async () => {
			// Fetch products data
			const productsData = await fetchData();
			// Set products state with fetched data
			setProducts(productsData);
		};

		// Call the function to get products data
		getProducts();
	}, [products]); // useEffect dependency to trigger re-fetching when products state changes

	return (
		<>
			<div className="container">
				<h1 className="my-5">Crud With NodeJS</h1>

				{/* Button for inserting test data */}
				<Seed />

				{/* Link to navigate to create new product page */}
				<Link to="/create" className="btn btn-success mb-3 mx-2">
					Create new product
				</Link>

				{/* Table to display products */}
				<div className="table-responsive text-center">
					<table className="table table-dark table-bordered">
						<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Price</th>
								<th>Description</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody className="table-group-divider">
							{/* Render each product as a row */}
							{products &&
								products.map((product) => {
									return (
										<Row
											key={product.id}
											product={product}
										/>
									);
								})}
						</tbody>
					</table>
				</div>
			</div>
		</>
	);
};

export default AllProducts;
