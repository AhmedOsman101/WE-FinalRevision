import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";

export const Update = () => {
	const [product, setProduct] = useState([]);

    

	const { id } = useParams();

	const fetchData = async () => {
		const result = await axios.get(`localhost:5000/products/${id}`);
		console.log(result.data.products);
		return result.data.products;
	};

	useEffect(() => {
		setProduct(fetchData());
	}, []);

	return (
		<>
			<div className="container">
				<h1 className="my-5">Crud With NodeJS</h1>

				<form onSubmit={handleSubmit} method="post">

                </form>
			</div>
		</>
	);
};
