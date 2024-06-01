import { useRef } from "react";
import { useNavigate } from "react-router-dom";
import axios from "axios";

const Create = () => {
	// useRef hook is used to get the form input value
	const nameRef = useRef();
	const priceRef = useRef();
	const descriptionRef = useRef();

	// useNavigate hook is used to navigate the user back to homepage
	// read more in the student guide unit 19, page: 46
	const navigate = useNavigate();

	// updating the product data
	const handleSubmit = async (e) => {
		// prevent the page from reloading after submitting the form
		e.preventDefault();

		// store the form data in an object
		const formData = {
			name: nameRef.current.value, // the current value of the name input field
			price: priceRef.current.value, // the current value of the price input field
			description: descriptionRef.current.value, // the current value of the description input field
		};

		try {
			// send the update request to the server
			const response = await axios.post(
				`http://localhost:5000/products/`,
				formData, // set the body of the request to the form data
			);
			// success message
			console.log("Product created successfully:");
			// redirect the user back to the homepage
			navigate("/");
		} catch (error) {
			console.error("Error creating product:", error);
		}
	};
	return (
		<>
			<div className="container">
				<h1 className="my-5">Create</h1>

				<form onSubmit={handleSubmit} method="post">
					<div className="mb-3">
						<label htmlFor="name" className="form-label">
							Name
						</label>
						<input
							type="text"
							className="form-control"
							name="name"
							id="name"
							ref={nameRef}
							placeholder="Product name"
						/>
					</div>
					<div className="mb-3">
						<label htmlFor="price" className="form-label">
							Price
						</label>
						<input
							type="number"
							className="form-control"
							name="price"
							id="price"
							ref={priceRef}
							placeholder="Product price"
						/>
					</div>
					<div className="mb-3">
						<label htmlFor="description" className="form-label">
							Description
						</label>
						<textarea
							className="form-control"
							name="description"
							id="description"
							ref={descriptionRef}
							placeholder="Product description"></textarea>
					</div>
					<button type="submit" className="btn btn-success">
						Create Product
					</button>
				</form>
			</div>
		</>
	);
};

export default Create;
