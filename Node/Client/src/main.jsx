import React from "react";
import ReactDOM from "react-dom/client";
import App from "./App.jsx";
// import BrowserRouter
import { BrowserRouter } from "react-router-dom";
// import bootstrap
import "../node_modules/bootstrap/dist/js/bootstrap.min.js";
import "../node_modules/bootstrap/dist/css/bootstrap.min.css";

ReactDOM.createRoot(document.getElementById("root")).render(
	// Wrap the entire application with BrowserRouter for routing
	<BrowserRouter>
		<React.StrictMode>
			<App />
		</React.StrictMode>
	</BrowserRouter>,
);
