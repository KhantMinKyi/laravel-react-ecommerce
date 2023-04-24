import React from "react";
import { createRoot } from "react-dom/client";
import { HashRouter, Link, Route, Routes } from "react-router-dom";
import Admin from "./Admin/Admin";
import ChangePassword from "./Admin/ChangePassword";

const MainRouter = () => {
    return (
        <HashRouter>
            <Routes>
                <Route path="/" element={<Admin />} />
                <Route path="/change-password" element={<ChangePassword />} />
            </Routes>
        </HashRouter>
    );
};
createRoot(document.getElementById("root")).render(<MainRouter />);
