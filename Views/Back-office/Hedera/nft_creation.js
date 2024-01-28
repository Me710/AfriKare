console.clear();
require("dotenv").config();
const {
  Client,
  TokenCreateTransaction,
  TokenType,
  TokenSupplyType,
  TokenInfoQuery,
  AccountBalanceQuery,
  PrivateKey,
  TokenMintTransaction,
} = require("@hashgraph/sdk");

//Grab your Hedera testnet account ID and private key from your .env file
const myAccountId = process.env.MY_ACCOUNT_ID;
const myPrivateKey = PrivateKey.fromStringDer(process.env.MY_PRIVATE_KEY);

const client = Client.forTestnet();
client.setOperator(myAccountId, myPrivateKey);

async function createNFT() {
  console.log("CreateNFT---------------------");
  let tokenCreateTx = await new TokenCreateTransaction()
    .setTokenName("MyNFT")
    .setTokenSymbol("MNFT")
    .setTokenType(TokenType.NonFungibleUnique)
    .setInitialSupply(0)
    .setTreasuryAccountId(myAccountId)
    .setSupplyType(TokenSupplyType.Finite)
    .setMaxSupply(5)
    .setSupplyKey(myPrivateKey)
    .setFreezeKey(myPrivateKey)
    .setPauseKey(myPrivateKey)
    .setAdminKey(myPrivateKey)
    .setWipeKey(myPrivateKey)
    .freezeWith(client);

  let tokenCreateSign = await tokenCreateTx.sign(myPrivateKey);
  let tokenCreateSubmit = await tokenCreateSign.execute(client);
  let tokenCreateRx = await tokenCreateSubmit.getReceipt(client);
  let tokenId = tokenCreateRx.tokenId;
  console.log(`- Created token with ID: ${tokenId}`);
  console.log("-----------------------------------");
  return tokenId;
}

async function queryTokenInfo(tokenId) {
  console.log("QueryTokenInfo---------------------");
  const query = new TokenInfoQuery().setTokenId(tokenId);
  const tokenInfo = await query.execute(client);
  console.log(JSON.stringify(tokenInfo, null, 4));
  console.log("-----------------------------------");
}

async function queryAccountBalance(accountId) {
  console.log("QueryAccountBalance----------------");
  const balanceQuery = new AccountBalanceQuery().setAccountId(accountId);
  const accountBalance = await balanceQuery.execute(client);
  console.log(JSON.stringify(accountBalance, null, 4));
  console.log("-----------------------------------");
}

const db = require("./config.js");

async function fetchDataFromDatabase() {
  try {
    const results = await db.executeQuery("SELECT * FROM users");
    console.log("Data from the database:", results);
    return results;
  } catch (error) {
    console.error("Error fetching data from the database:", error);
    throw error; // Re-throw the error to handle it outside this function if needed
  }
}

async function mintNFTWithDatabaseData(tokenId) {
  try {
    // Fetch data from the database
    const userData = await fetchDataFromDatabase();

    // Mint new NFT with metadata including database data
    let mintTx = await new TokenMintTransaction()
      .setTokenId(tokenId)
      .setMetadata([
        Buffer.from("ipfs://QmTzWcVfk88JRqjTpVwHzBeULRTNzHY7mnBSG42CpwHmPa"),
        Buffer.from("secondToken"),
        Buffer.from("thirdToken"),
        Buffer.from("fourthToken"),
        Buffer.from(JSON.stringify(userData)), // Include database data in metadata
      ])
      .execute(client);

    let mintRx = await mintTx.getReceipt(client);
    // Log the serial number
    console.log(`- Created NFT ${tokenId} with serial: ${mintRx.serials} \n`);
    console.log("Mint Transaction Receipt:", JSON.stringify(mintRx, null, 4));
    console.log("-----------------------------------");
  } catch (error) {
    console.error("Error in mintNFTWithDatabaseData:", error);
  }
}

async function main() {
  const tokenId = await createNFT();
  await queryTokenInfo(tokenId);
  await queryAccountBalance(myAccountId);
  await mintNFTWithDatabaseData(tokenId);
  await queryAccountBalance(myAccountId);
}

main();
