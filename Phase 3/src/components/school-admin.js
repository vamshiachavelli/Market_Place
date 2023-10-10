import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import image from './images/profile.jpg'

export default class SchoolAdmin extends Component {
  render() {
    return (
       
    <section class="container">
    <aside class="sidebar">
        <p>Welcome: Anthony Johnson</p>
        <p>Category: School Admin</p>
        <img src={image} class="propic" alt="" />
        <div class="frmlink">
            <Link to="/">Logout</Link>
        </div>
    </aside>

    <div class="content">
        <div>
            <div class="head">
                <p>Business Owner</p>
                <p>Add/Delete</p>
            </div>
            <div class="item">
                <p style={{background: '#75b0f5', border: 'none', padding: '20px', marginTop: '10px'}}>Full Name | owner@mail.com</p>
            </div>
            <div class="item">
                <p style={{background: '#75b0f5', border: 'none', padding: '20px', marginTop: '10px'}}> Another name | another@mail.com</p>
            </div>
            <div class="head">
                <p>Students</p>
                <p>Add/Delete</p>
            </div>
            <div class='item'>
                        <p style={{border: '2px solid #75b0f5', padding: '20px', marginTop: '10px'}}>student name | student email</p>
                        <p style={{border: '2px solid #75b0f5', padding: '20px', marginTop: '10px'}}> <a href="/">Chart</a> </p> 
                </div>
                <div class='item'>
                        <p style={{border: '2px solid #75b0f5', padding: '20px', marginTop: '10px'}}>student name | student email</p>
                        <p style={{border: '2px solid #75b0f5', padding: '20px', marginTop: '10px'}}> <a href="/">Chart</a> </p> 
                </div>
        </div>
        
    </div>
</section> 
    )
  }
}
