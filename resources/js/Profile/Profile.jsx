import axios from "axios";
import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import Loader from "../Components/Loader";
import { format } from "date-fns";
import SmallLoader from "../Components/SmallLoader";
function Profile() {
    const [user, setUser] = useState({});
    const [loader, setLoader] = useState(true);
    const [updateLoader, setUpdateLoader] = useState(false);
    const [name, setName] = useState(window.auth.name);
    const [email, setEmail] = useState(window.auth.email);
    const [address, setAddress] = useState(window.auth.address);
    const [phone, setPhone] = useState(window.auth.phone);
    const [image, setImage] = useState(window.auth.image);
    const [nrc, setNrc] = useState(window.auth.nrc);
    useEffect(() => {
        const user_id = window.auth.id;
        axios.get("/api/user?user_id=" + user_id).then((d) => {
            if (d.data.message === false) {
                showToast("User Not Found");
            } else {
                setUser(d.data.data);
            }
            setLoader(false);
        });
    }, []);
    const updateInfo = () => {
        const user_id = window.auth.id;
        const data = { name, address, image, phone };
        setUpdateLoader(true);
        axios
            .post("/api/update?user_id=" + user_id, data, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
            .then((d) => {
                const { data } = d;
                if (data.message === false) {
                    showToast("User Not Found", "error");
                    setUpdateLoader(false);
                } else {
                    setUser(data.data);
                    showToast("User Information Updated Successfully");
                    setUpdateLoader(false);
                }
            });
    };

    return (
        <div className="container">
            {loader && <Loader />}
            {!loader && (
                <>
                    <div className="row">
                        <div className="mt-4">
                            <h6>{user.name}'s Account</h6>
                            <hr className="horizontal dark"></hr>
                        </div>
                        <div className="col-sm col-md-5 col-lg-4  rounded p-4">
                            <div className="row">
                                <div className="col-6">
                                    <img
                                        src={user.img_url}
                                        className="img-thumbnail rounded-circle"
                                        style={{ width: 150, height: 150 }}
                                    ></img>
                                </div>
                                <div className="col-6">
                                    <small>Name</small>
                                    <h6>{user.name}</h6>
                                    <Link
                                        to="/change-password"
                                        className="text-weight-bold text-md"
                                        style={{ color: "gray" }}
                                    >
                                        Change Password
                                    </Link>
                                </div>
                            </div>
                            <hr className="horizontal dark"></hr>
                        </div>
                        <div className="col-sm col-md-7 col-lg-8  ">
                            <h5>Personal Information</h5>
                            <span>
                                Your Personal Information Will Display Here!
                                Your Information Will not be Shared To Anyone!
                            </span>
                            <hr className="horizontal dark"></hr>
                            {/* Right Side Of User Info */}
                            <div className="row">
                                {/* Name /Email /Address/phone/nrc */}
                                <div className="col-md-6 mt-4">
                                    <div className="card p-4">
                                        <div className="row">
                                            <div className="col-10">
                                                <span>User Name</span>
                                            </div>
                                            <div className="col-2">
                                                <i className="fa fa-solid fa-user text-danger"></i>
                                            </div>
                                        </div>
                                        <h6 className="text-dark mt-3">
                                            {user.name}
                                        </h6>
                                    </div>
                                </div>
                                {/* email */}
                                <div className="col-md-6 mt-4">
                                    <div className="card p-4">
                                        <div className="row">
                                            <div className="col-10">
                                                <span>Email Address</span>
                                            </div>
                                            <div className="col-2">
                                                <i className="fa fa-solid fa-envelope text-danger"></i>
                                            </div>
                                        </div>
                                        <h6 className="text-dark mt-3">
                                            {user.email}
                                        </h6>
                                    </div>
                                </div>
                                {/* phone */}
                                <div className="col-md-6 mt-4">
                                    <div className="card p-4">
                                        <div className="row">
                                            <div className="col-10">
                                                <span>Phone Number</span>
                                            </div>
                                            <div className="col-2">
                                                <i className="fa fa-solid fa-phone text-warning"></i>
                                            </div>
                                        </div>
                                        <h6 className="text-dark mt-3">
                                            {user.phone}
                                        </h6>
                                    </div>
                                </div>
                                {/* address */}
                                <div className="col-md-6 mt-4">
                                    <div className="card p-4">
                                        <div className="row">
                                            <div className="col-10">
                                                <span>User Address</span>
                                            </div>
                                            <div className="col-2">
                                                <i className="fa fa-solid fa-location-arrow text-warning"></i>
                                            </div>
                                        </div>
                                        <h6 className="text-dark mt-3">
                                            {user.address}
                                        </h6>
                                    </div>
                                </div>
                                {/* nrc */}
                                <div className="col-md-6 mt-4">
                                    <div className="card p-4">
                                        <div className="row">
                                            <div className="col-10">
                                                <span>National Card ID</span>
                                            </div>
                                            <div className="col-2">
                                                <i className="fa fa-regular fa-id-card text-success"></i>
                                            </div>
                                        </div>
                                        <h6 className="text-dark mt-3">
                                            {user.nrc}
                                        </h6>
                                    </div>
                                </div>
                                {/* Join date */}
                                <div className="col-md-6 mt-4">
                                    <div className="card p-4">
                                        <div className="row">
                                            <div className="col-10">
                                                <span>Joined Since</span>
                                            </div>
                                            <div className="col-2">
                                                <i className="fa fa-solid fa-calendar text-success"></i>
                                            </div>
                                        </div>
                                        <h6 className="text-dark mt-3">
                                            {format(
                                                new Date(user.created_at),
                                                "MM/dd/yyyy"
                                            )}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr className="horizontal dark mt-2"></hr>
                    {/* Update Information  */}
                    <div className="col-md-12 ">
                        <div className="card">
                            <h5 className="text-center py-4">
                                Update Your Personal Information
                            </h5>
                            <div className="row">
                                {/* name */}
                                <div className="form-group px-4 col-md-6">
                                    <label>
                                        <span>Name</span>
                                    </label>
                                    <input
                                        type="text"
                                        className="form-control"
                                        defaultValue={user.name}
                                        onChange={(e) =>
                                            setName(e.target.value)
                                        }
                                    ></input>
                                </div>

                                {/* email */}
                                <div className="form-group px-4 col-md-6">
                                    <label>
                                        <span>Email</span>
                                    </label>
                                    <input
                                        type="text"
                                        className="form-control"
                                        defaultValue={user.email}
                                        disabled
                                        onChange={(e) =>
                                            setEmail(e.target.value)
                                        }
                                    ></input>
                                </div>
                                {/* phone */}
                                <div className="form-group px-4 col-md-6">
                                    <label>
                                        <span>Phone</span>
                                    </label>
                                    <input
                                        type="number"
                                        className="form-control"
                                        defaultValue={user.phone}
                                        onChange={(e) =>
                                            setPhone(e.target.value)
                                        }
                                    ></input>
                                </div>
                                {/* nrc */}
                                <div className="form-group px-4 col-md-6">
                                    <label>
                                        <span>National Card ID</span>
                                    </label>
                                    <input
                                        type="text"
                                        className="form-control"
                                        disabled
                                        defaultValue={user.nrc}
                                        onChange={(e) => setNrc(e.target.value)}
                                    ></input>
                                </div>
                                {/* Image */}
                                <div className="form-group px-4 col-md-6">
                                    <label>
                                        <span>Image</span>
                                    </label>
                                    <input
                                        type="file"
                                        className="form-control"
                                        onChange={(e) =>
                                            setImage(e.target.files[0])
                                        }
                                    ></input>
                                    <img
                                        src={user.img_url}
                                        className="img img-thumbnail"
                                        style={{ width: 80 }}
                                    ></img>
                                </div>
                                {/* Address */}
                                <div className="form-group px-4 col-md-6">
                                    <label>
                                        <span>Address</span>
                                    </label>
                                    <textarea
                                        defaultValue={user.address}
                                        className="form-control"
                                        onChange={(e) =>
                                            setAddress(e.target.value)
                                        }
                                    ></textarea>
                                </div>
                                <div className="form-group px-4 col-sm ">
                                    <button
                                        className="btn btn-primary"
                                        onClick={() => updateInfo()}
                                    >
                                        {updateLoader && <SmallLoader />}
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </>
            )}
        </div>
    );
}

export default Profile;
