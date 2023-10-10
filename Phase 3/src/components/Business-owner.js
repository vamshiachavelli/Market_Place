import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import image from './images/profile.jpg'

export default class BusinessOwner extends Component {
  render() {
    return (
        <section class="container">
        <aside class="sidebar">
            <p>Welcome: Sridar S.</p>
            <p>Category: Business Owner</p>
            <img src={image} className="propic" alt={""} />
            <div class="frmlink">
                <Link to="/">Logout</Link>
            </div>
        </aside>

        <div class="content">
            <div>
                <div class="head">
                    <p>Order</p>
                </div>
                <div class='item'>
                    <p style={{border: '2px solid #75b0f5', padding: '20px', marginTop: '10px'}}>
                    product: HP laptop | buyer: john doe | Quantity: 2
                    </p>
                </div>
                <div class='item'>
                    <p style={{border: '2px solid #75b0f5', padding: '20px', marginTop: '10px'}}>
                    product: Dell PC | buyer: john doe | Quantity: 2
                    </p>
                </div>
               <hr />
                <div class="head">

                    <p>Students</p>
                </div>
                <div class='item'>
                        <p style={{border: '2px solid #75b0f5', padding: '20px', marginTop: '10px'}}>"student name | student email</p>
                        <p style={{border: '2px solid #75b0f5', padding: '20px', marginTop: '10px'}}> <a href="/">Chart</a> </p> 
                </div>
                <div class='item'>
                        <p style={{border: '2px solid #75b0f5', padding: '20px', marginTop: '10px'}}>"student name | student email</p>
                        <p style={{border: '2px solid #75b0f5', padding: '20px', marginTop: '10px'}}> <a href="/">Chart</a> </p> 
                </div>
                <div class='item'>
                        <p style={{border: '2px solid #75b0f5', padding: '20px', marginTop: '10px'}}>"student name | student email</p>
                        <p style={{border: '2px solid #75b0f5', padding: '20px', marginTop: '10px'}}> <a href="/">Chart</a> </p> 
                </div>
               
            </div>
            
        </div>
    </section> 
    )
  }
}
