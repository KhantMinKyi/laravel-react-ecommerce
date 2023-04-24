import React from "react";
import { createRoot } from "react-dom/client";
import { HashRouter, Route, Routes } from "react-router-dom";
import About from "./Home/About";

const MainRouter = () => {
    return (
        <HashRouter>
            <Routes>
                <Route path="/" element={<About />} />
            </Routes>
        </HashRouter>
    );
};
createRoot(document.getElementById("root")).render(<MainRouter />);
