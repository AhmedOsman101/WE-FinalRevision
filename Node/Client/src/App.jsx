import { Route, Routes } from "react-router-dom";
import AllProducts from "./pages/AllProducts";
import Error from "./pages/Error";
import { Update } from "./Update";

function App() {
	return (
		<>
			<Routes>
				<Route path="/" Component={AllProducts} />
				<Route path="/edit/:id" Component={Update} />

				{/* Optional */}
				<Route path="*" Component={Error} />
			</Routes>
		</>
	);
}

export default App;
