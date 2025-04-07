Evan Trafton
https://ettrafto.w3.uvm.edu/cs2480/live-final/index.php

# Personal Finance Tracker

This project is a **web-based personal finance tracking and budgeting tool** designed to help users manage their income, expenses, and financial goals more effectively.

## 🗂️ Overview

The project centers around a database system that manages:

- Users
- Accounts (e.g., savings, spending)
- Transactions
- Categories
- Budgets

## 📄 Website Structure

The application is divided into five pages, four of which are accessible to standard users:

### 1. **Dashboard**
- Displays current monthly budget and goal budget using pie charts.
- Shows a line chart of the user's account balance throughout the month.
- Provides quick access to:
  - Account balances
  - Most recent transactions

### 2. **Transactions**
- Lists all transactions with the following fields:
  - Name
  - Category
  - Account
  - Date
  - Amount

### 3. **Breakdown**
- Groups transactions by category.
- Shows total spending per category.
- Includes a pie chart displaying the percentage each category contributes to total monthly spending.

### 4. **Goals**
- Allows users to set monthly budgeting goals:
  - Total monthly spending
  - Total monthly income
  - Spending limits per category

### 5. **Managers Page** (Admin Only)
- Allows managers to:
  - View all users
  - View user-created budgets
- Note: Managers **cannot** access users’ transaction or account data.

## 🔮 Future Plans

- Integrate the **Plaid API** to pull real bank transaction data.
- Currently, the application operates with **test data only**.

---

