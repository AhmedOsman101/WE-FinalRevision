import axios from "axios";
import { Link } from "react-router-dom";

const Row = ({ product }) => {
	// Function to handle deletion of a product
	const handleDelete = async () => {
		try {
			// Send a DELETE request to the server to delete the product by ID
			await axios.delete(`http://localhost:5000/products/${product.id}`);
		} catch (error) {
			// Log any errors that occur during the deletion process
			console.error("Error deleting product:", error);
		}
	};

	return (
		<>
			{/* Table row containing product information */}
			<tr>
				<td>{product.id}</td>
				<td>{product.name}</td>
				<td>${product.price}</td>
				<td>{product.description}</td>

				{/* Actions column containing Edit and Delete buttons */}
				<td className="d-flex justify-content-around">
					{/* Link to navigate to the Edit product page */}
					<Link to={`edit/${product.id}`} className="btn btn-success">
						Edit
					</Link>
					{/* Button to delete the product */}
					<button
						onClick={handleDelete} // Call handleDelete function on button click
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
