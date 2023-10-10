import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import image from './images/profile.jpg'

export default class StudentPanel extends Component {
  render() {
    return (
        <section className="container">
            <aside className="sidebar">
                <p>Welcome: Johnson Brandy</p>
                <p>Category: Student</p>
                <img src={image} class="propic" alt={""} />
                <div className="frmlink">
                    <Link to="/">Logout</Link>
                </div>
            </aside>

            <div class="content" style={{width: '100%'}}>
                <div>
                    <div class="head">
                        <p>Post</p>
                        <p>New/Delete</p>
                    </div>
                    <div class="item">
                        <p>Hi every one</p>
                    </div>
                    <div class="head">
                        <p>Clubs</p>
                        <p>Create/Delete</p>
                    </div>
                    <div class="item">
                        <p>Drama</p>
                        <p>Dance</p>
                        <p>Football</p>
                        <p>Racing</p>
                    </div>
                    <div class="head">
                        <p>Product</p>
                        <p>Add/Remove</p>
                    </div>
                    <div class="item">
                        <p>Laptop</p>
                        <p>Chair</p>
                        <p>Phone</p>
                        <p>Tea glass</p>
                    </div>
                </div>
            </div>
        </section> 
    )
  }
}
