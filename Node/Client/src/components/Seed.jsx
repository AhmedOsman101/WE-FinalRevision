import axios from "axios";

const Seed = () => {
	const handleClick = async () => {
		await axios.post("http://localhost:5000/seed");
	};

	return (
		<>
			<>
				<button
					onClick={handleClick}
					type="button"
					className="btn btn-primary mb-3">
					Seed
				</button>
			</>
		</>
	);
};

export default Seed;
