// Directly use the Hashgraph SDK objects without CommonJS require
const {
  Client,
  PrivateKey,
  AccountCreateTransaction,
  AccountBalanceQuery,
  Hbar,
} = require("@hashgraph/sdk");

const myAccountId = "0.0.7713642";
const myPrivateKey =
  "3030020100300706052b8104000a04220420bb2c729fb69b93513ab331bb01ab0d5e4cc9affaec74c16fabf9c82d6c1d94e4";

// Create your connection to the Hedera Network
const client = Client.forTestnet();
client.setOperator(myAccountId, myPrivateKey);

// Set the default maximum transaction fee (in Hbar)
client.setDefaultMaxTransactionFee(new Hbar(100));

// Set the maximum payment for queries (in Hbar)
client.setMaxQueryPayment(new Hbar(50));

// Create new keys
const newAccountPrivateKey = PrivateKey.generate();
const newAccountPublicKey = newAccountPrivateKey.publicKey;

// Create a new account with 1,000 tinybar starting balance
const newAccount = await new AccountCreateTransaction()
  .setKey(newAccountPublicKey)
  .setInitialBalance(Hbar.fromTinybars(1000))
  .execute(client);

// Get the new account ID
const getReceipt = await newAccount.getReceipt(client);
const newAccountId = getReceipt.accountId;

console.log("\nNew account ID: " + newAccountId);

// Verify the account balance
const accountBalance = await new AccountBalanceQuery()
  .setAccountId(newAccountId)
  .execute(client);

console.log(
  "The new account balance is: " +
    accountBalance.hbars.toTinybars() +
    " tinybar."
);

// Set the generated private key in the MY_ACCOUNT_ID input field
document.getElementById("ID").value = newAccountId.toString();
document.getElementById("KEY").value = newAccountPrivateKey.toString();
