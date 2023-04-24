import React from "react";

export default function Loader() {
    return (
        <div className="text-center mt-2">
            <div
                className="spinner-grow text-primary"
                style={{ width: "3rem", height: "3rem" }}
                role="status"
            >
                <span className="sr-only">Loading...</span>
            </div>
        </div>
    );
}
