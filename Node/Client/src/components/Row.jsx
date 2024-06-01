import axios from "axios";
import { Link } from "react-router-dom";

const Row = ({ product }) => {
	const handleDelete = async () => {
		await axios.delete(`http://localhost:5000/products/${product.id}`);
	};

	return (
		<>
			<tr>
				<td>{product.id}</td>
				<td>{product.name}</td>
				<td>${product.price}</td>
				<td>{product.description}</td>
				<td className="d-flex justify-content-around">
					<Link to={`edit/${product.id}`} className="btn btn-success">
						Edit
					</Link>
					<button
						onClick={handleDelete}
						type="button"
						className="btn btn-danger">
						Delete
					</button>
				</td>
			</tr>
		</>
	);
};

export default Row;
