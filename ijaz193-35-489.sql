-- ijaz bin shad aditta
-- 193-35-489
-- section A2

-- I. Find the seller name whose sold quantity is more than any seller who sold at 11th December 2019:
SELECT Name
FROM Seller
WHERE SellerID = (
    SELECT SellerID
    FROM Invoice
    WHERE Date = '11 Dec 2019'
    ORDER BY QtyKG DESC
    LIMIT 1
);


-- II. Find the onion type which is sold in the highest amount:
SELECT OnionType
FROM Invoice
GROUP BY OnionType
ORDER BY SUM(QtyKG) DESC
LIMIT 1;


-- III. Find those seller names who sold at 11th December 2019:
SELECT Name
FROM Seller
WHERE SellerID IN (
    SELECT SellerID
    FROM Invoice
    WHERE Date = '11 Dec 2019'
);


-- IV. Show the name of the Seller who sells Indian Onion:
SELECT Name
FROM Seller
WHERE SellerID IN (
    SELECT SellerID
    FROM Invoice
    WHERE OnionType = 'India'
);


-- V. Find the Onion which has the highest price than all others:
SELECT OnionType
FROM Invoice
ORDER BY Price DESC
LIMIT 1;


-- VI. Show the total price of each type of onion that is sold:
SELECT OnionType, SUM(Price * QtyKG) AS TotalPrice
FROM Invoice
GROUP BY OnionType;


-- VII. Find the store ID which has more than one employee:
SELECT StoreID
FROM Seller
GROUP BY StoreID
HAVING COUNT(*) > 1;


-- VIII. Show the price of onion which is more than 40 taka per kg:
SELECT *
FROM Invoice
WHERE Price > 40;


-- IX. Find seller name and ID whose name starts with K:
SELECT SellerID, Name
FROM Seller
WHERE Name LIKE 'K%';


-- X. Find the invoice info which price is in between 40 and 190:
SELECT *
FROM Invoice
WHERE Price BETWEEN 40 AND 190;


-- XI. Find the sellers whose name contains 'h' in the 3rd position:
SELECT *
FROM Seller
WHERE SUBSTRING(Name, 3, 1) = 'h';


-- XII. Find the list of onion types using distinct:
SELECT DISTINCT OnionType
FROM Invoice;

