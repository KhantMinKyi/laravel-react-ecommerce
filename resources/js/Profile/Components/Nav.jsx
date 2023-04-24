import React from "react";
import { Link, useLocation } from "react-router-dom";

function Nav() {
    const { pathname } = useLocation();
    return (
        <nav className="navbar navbar-expand bg-dark ">
            <div className="container-fluid">
                <div
                    className="collapse navbar-collapse justify-content-end"
                    id="navbarNavAltMarkup"
                >
                    <div className="navbar-nav">
                        <Link
                            to="/"
                            className={`nav-link mx-2 text-${
                                pathname === "/" ? "primary" : "white"
                            } font-weight-bold `}
                        >
                            Profile
                        </Link>
                        <Link
                            to="/cart"
                            className={`nav-link mx-2 text-${
                                pathname === "/cart" ? "primary" : "white"
                            } font-weight-bold `}
                        >
                            Cart
                        </Link>
                        <Link
                            to="/order"
                            className={`nav-link mx-2 text-${
                                pathname === "/order" ? "primary" : "white"
                            } font-weight-bold `}
                        >
                            Order Lists
                        </Link>
                    </div>
                </div>
            </div>
        </nav>
    );
}

export default Nav;
