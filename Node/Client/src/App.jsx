import { Route, Routes } from "react-router-dom";
import AllProducts from "./pages/AllProducts";
import Error from "./pages/Error";
import Update from "./pages/Update";
import Create from "./pages/Create";

function App() {
	return (
		<>
			<Routes>
				<Route path="/" Component={AllProducts} />
				<Route path="/edit/:id" Component={Update} />
				<Route path="/create" Component={Create} />

				{/* Optional */}
				<Route path="*" Component={Error} />
			</Routes>
		</>
	);
}

export default App;
