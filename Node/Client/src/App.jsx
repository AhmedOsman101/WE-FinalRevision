import { Route, Routes } from "react-router-dom";
import AllProducts from "./pages/AllProducts";
import Error from "./pages/Error";
import Update from "./pages/Update";
import Create from "./pages/Create";

function App() {
	return (
		<>
			{/* Define the routes for the application */}
			<Routes>
				{/* Route for displaying all products */}
				<Route path="/" Component={AllProducts} />

				{/* Route for updating an existing product by id */}
				<Route path="/edit/:id" Component={Update} />

				{/* Route for creating a new product */}
				<Route path="/create" Component={Create} />

				{/* Route for handling non-existent paths (optional) */}
				<Route path="*" Component={Error} />
			</Routes>
		</>
	);
}

export default App;
