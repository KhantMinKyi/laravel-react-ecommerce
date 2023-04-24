import React, { useState } from "react";
import StarRatings from "react-star-ratings";
import Loader from "../../Components/Loader";
import axios from "axios";

function WriteReview({ review }) {
    const [reviewList, setReviewList] = useState(review);
    const [comment, setComment] = useState("");
    const [rating, setRating] = useState(0);
    const [loader, setLoader] = useState(false);
    const disableReview = rating && comment !== "" ? false : true;

    // Make Review
    const makeReview = () => {
        const user_id = window.auth.id;
        const slug = window.product_slug;
        const data = { user_id, slug, rating, comment };
        axios.post("/api/review/" + slug, data).then(({ data }) => {
            if (data.message === false) {
                showToast("Product Not Found");
            } else {
                setReviewList([...reviewList, data.data]);
                setLoader(false);
                setRating(0);
                setComment("");
            }
        });
    };

    return (
        <div className="row">
            <div className="col-sm col-md-12 col-lg-6">
                <div className="row">
                    <h6 className="text-center mb-2">Top Reviews</h6>
                    {reviewList.map((d) => (
                        <React.Fragment key={d.id}>
                            <div className="col-sm col-md-3 mt-2">
                                <img
                                    src={d.user.img_url}
                                    style={{ width: "100px" }}
                                    className="rounded-circle"
                                />
                            </div>
                            <div className="col-sm col-md-9 mt-2">
                                <div className="mt-2">
                                    <h6>{d.user.name}</h6>
                                </div>
                                <div className="mb-2">
                                    <StarRatings
                                        rating={d.rating}
                                        starRatedColor="#A7C61A"
                                        numberOfStars={5}
                                        starDimension="24px"
                                        name="rating"
                                    />
                                </div>
                                <div>
                                    <p> {d.review}</p>
                                </div>
                                <hr className="horizontal dark" />
                            </div>
                        </React.Fragment>
                    ))}
                    <hr className="horizontal dark" />
                    <div>
                        <a href="#" className="btn btn-dark">
                            See All Reviews
                        </a>
                    </div>
                </div>
            </div>
            {window.auth && (
                <div className="col-sm col-md-12 col-lg-6">
                    <h5 className="text-primary">Review Product</h5>
                    {loader && <Loader />}
                    {!loader && (
                        <div className="border rounded p-4">
                            <div className="form-group">
                                <label>
                                    <h6>Name</h6>
                                </label>
                                <input
                                    type="disable"
                                    defaultValue={window.auth.name}
                                    className="form-control"
                                    disabled
                                />
                            </div>
                            <div className="form-group">
                                <label>
                                    <h6>Ratings</h6>
                                </label>
                                <div>
                                    <StarRatings
                                        rating={rating}
                                        starRatedColor="#A7C61A"
                                        starHoverColor="#87A016"
                                        numberOfStars={5}
                                        changeRating={(rateCount) =>
                                            setRating(rateCount)
                                        }
                                        starDimension="24px"
                                        name="rating"
                                    />
                                </div>
                            </div>
                            <div className="form-group">
                                <label>
                                    <h6>Write a Review</h6>
                                </label>
                                <textarea
                                    name="review"
                                    className="form-control"
                                    value={comment}
                                    onChange={(e) => setComment(e.target.value)}
                                />
                            </div>
                            <button
                                className="btn btn-dark"
                                disabled={disableReview}
                                onClick={() => makeReview()}
                            >
                                Make A Review
                            </button>
                        </div>
                    )}
                </div>
            )}
        </div>
    );
}

export default WriteReview;
