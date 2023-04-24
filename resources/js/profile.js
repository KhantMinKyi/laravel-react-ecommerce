import React from "react";
import { createRoot } from "react-dom/client";
import { HashRouter, Link, Route, Routes } from "react-router-dom";
import Profile from "./Profile/Profile";
import Cart from "./Profile/Cart";
import Order from "./Profile/Order";
import Nav from "./Profile/Components/Nav";
import ChangePassword from "./Profile/ChangePassword";

const MainRouter = () => {
    return (
        <HashRouter>
            <Nav />
            <Routes>
                <Route path="/" element={<Profile />} />
                <Route path="/cart" element={<Cart />} />
                <Route path="/order" element={<Order />} />
                <Route path="/change-password" element={<ChangePassword />} />
            </Routes>
        </HashRouter>
    );
};
createRoot(document.getElementById("root")).render(<MainRouter />);
