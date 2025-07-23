# AW Customer Generate Coupon Restricted

Adds a new [AutomateWoo](https://woocommerce.com/products/automatewoo/) variable that generates a unique coupon, optionally restricted to the customer’s email address. Built for WooCommerce merchants who want more control over coupon usage in automated workflows.

## 🚀 Features

- New variable: `{{ customer.generate_coupon_restricted }}`
- Works just like `customer.generate_coupon`, but with a checkbox to restrict usage
- Email restriction enforced via WooCommerce coupon settings
- Fully compatible with coupon templates and parameters

## 🛠 Usage

1. Activate the plugin in WordPress.
2. Create or edit an AutomateWoo workflow that uses a `customer` object (e.g. “Review Posted” or “Order Created”).
3. Add a “Send Email” or “Add Note” action.
4. Use this variable:

   ```
   {{ customer.generate_coupon_restricted template: 'your-template' use_email_restriction: 'yes' }}
   ```

5. Or insert it from the variable picker and enable the checkbox for email restriction.

## 🧩 Example Workflow

**Trigger**: Customer leaves a product review  
**Action**: Send a thank-you email with a discount code limited to their email address

## 🔧 Installation

1. Upload the plugin folder to `/wp-content/plugins/`
2. Activate it via the WordPress admin
3. The variable will automatically be available in AutomateWoo workflows under the `customer` section

## 💡 Why This Exists

AutomateWoo’s default coupon variable doesn't include built-in support for email restriction. This plugin extends that functionality for a common use case: **personalized, one-time-use coupons**.

## 🧠 Credits

Developed by [Raif](https://github.com/raifd)  
Built with the help of [ChatGPT](https://openai.com/chatgpt) for prototyping, debugging, and WooCommerce integration guidance.

## 📄 License

This plugin is licensed under the [GNU General Public License v2.0 or later](https://www.gnu.org/licenses/gpl-2.0.html).
