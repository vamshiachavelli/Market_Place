import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import image from './images/profile.jpg'

export default class SuperAdmin extends Component {
  render() {
    return (
        <section class="container">
        <aside class="sidebar">
            <p>Welcome: Srikar Dupatti</p>
            <p>Category: Super Admin</p>
            <img src={image} class="propic" alt="" />
            <div class="frmlink">
                <Link to="/">Logout</Link>
            </div>
        </aside>

        <div class="content">
            <div>
                <div class="head">
                    <p>School_Admin</p>
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
                <div class="item">
                <p style={{background: '#75b0f5', border: 'none', padding: '20px', marginTop: '10px'}}>Full Name | owner@mail.com</p>
            </div>
            <div class="item">
                <p style={{background: '#75b0f5', border: 'none', padding: '20px', marginTop: '10px'}}> Another name | another@mail.com</p>
            </div>
            </div>
            
        </div>
    </section> 

    )
  }
}
