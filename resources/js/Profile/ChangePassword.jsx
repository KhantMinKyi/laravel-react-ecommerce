import React, { useState } from "react";
import SmallLoader from "../Components/SmallLoader";
import axios from "axios";

function ChangePassword() {
    const [currentPassword, setCurrnetPassword] = useState("");
    const [newPassword, setNewPassword] = useState("");
    const [confirmPassword, setConfirmPassword] = useState("");
    const [loader, setLoader] = useState(false);

    const ChangePassword = () => {
        const user_id = window.auth.id;

        if (newPassword !== confirmPassword) {
            showToast("Confirm Password Doesn't Match", "error");
        } else {
            setLoader(true);
            axios
                .post("/api/change-password?user_id=" + user_id, {
                    currentPassword,
                    newPassword,
                })
                .then((d) => {
                    const { data } = d;
                    if (data.message === false) {
                        showToast("Wrong Password, Please Try Again", "error");
                        setLoader(false);
                    } else {
                        showToast("Your Password is Changed Successfully!");
                    }
                    setLoader(false);
                });
        }
    };
    return (
        <div className="container">
            <div className="row">
                {/* card */}
                <div className="card mt-3 col-md-6">
                    <div className="card-header">
                        <h6>Change Password</h6>
                    </div>
                    <div className="card-body">
                        <div className="form-group">
                            <label>Enter Current Password</label>
                            <input
                                type="password"
                                className="form-control"
                                onChange={(e) =>
                                    setCurrnetPassword(e.target.value)
                                }
                            ></input>
                        </div>
                        <div className="form-group">
                            <label>Enter New Password</label>
                            <input
                                type="password"
                                className="form-control"
                                onChange={(e) => setNewPassword(e.target.value)}
                            ></input>
                        </div>
                        <div className="form-group">
                            <label>Confirm New Password</label>
                            <input
                                type="password"
                                className="form-control"
                                onChange={(e) =>
                                    setConfirmPassword(e.target.value)
                                }
                            ></input>
                        </div>
                        <div>
                            <button
                                className="btn btn-dark"
                                onClick={() => ChangePassword()}
                            >
                                {loader && <SmallLoader />}
                                Change
                            </button>
                        </div>
                    </div>
                </div>
                {/* policy */}
                <div className="col-md-6 p-4">
                    <h6>Privicy and Policy of Changing Password</h6>
                    <span className="p-1">
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of
                        Letraset sheets containing Lorem Ipsum passages, and
                        more recently with desktop publishing software like
                        Aldus PageMaker including versions of Lorem Ipsum.
                    </span>
                </div>
            </div>
        </div>
    );
}

export default ChangePassword;
