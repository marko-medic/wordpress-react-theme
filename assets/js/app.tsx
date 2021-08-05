import React from "react";
import ReactDOM from "react-dom";
import Footer from "./components/Footer";
import Header from "./components/Header"

const App = () => <div>
	<Header title="Hey" />
	<p>Content...</p>
	<Footer>Copyright...</Footer>
</div>

ReactDOM.render(<App />, document.getElementById("root"));
