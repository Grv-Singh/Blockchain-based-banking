print("\tWelcome to The Bank\n\n")

index=[]

count=0
flag=1

if index is null and flag=1:
	cust_name=input("Your Name?\n")
	cust_surname=input("Your Surname?\n")
	cust_dob=input("Your Date Of Birth?\n")
	cust_aadhar_no=int(input("Your Aadhar Number?\n"))
	nominee_name=input("Nominee Name")
	nominee_surname=input("Nominee Surname")
	flag=0

arr=[cust_name,cust_surname,cust_dob,cust_aadhar_no,nominee_name,nominee_surname]

for i in range(0,len(index)):
	if index[i]!=arr:
		count+=1
	else:
		print("\nDuplicate Customer\n")
		break
if count==len(index):
	index.append(arr)

