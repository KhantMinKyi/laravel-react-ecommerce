import React from "react";
import { createRoot } from "react-dom/client";
import { HashRouter, Route, Routes } from "react-router-dom";
import Contact from "./Home/Contact";

const MainRouter = () => {
    return (
        <HashRouter>
            <Routes>
                <Route path="/" element={<Contact />} />
            </Routes>
        </HashRouter>
    );
};
createRoot(document.getElementById("root")).render(<MainRouter />);
