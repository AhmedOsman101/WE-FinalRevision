import { useEffect, useState } from "react";
import axios from "axios";
import Row from "../components/Row";
import Seed from "../components/Seed";
import { Link } from "react-router-dom";

const AllProducts = () => {
	const [products, setProducts] = useState();

	const fetchData = async () => {
		try {
			const result = await axios.get(`http://localhost:5000/products`);
			return result.data.products;
		} catch (error) {
			console.error("Error fetching data: ", error);
			return [];
		}
	};

	useEffect(() => {
		const getProducts = async () => {
			const productsData = await fetchData();
			setProducts(productsData);
		};

		getProducts();
	}, [products]);

	return (
		<>
			<div className="container">
				<h1 className="my-5">Crud With NodeJS</h1>

				<Seed />
				<Link to="/create" className="btn btn-success mb-3 mx-2">
					Create new product
				</Link>
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
