#include<stdio.h>
#include<conio.h>
void create();
void insert_first();
void insert_middle();
void insert_last();
void delete_first();
void delete_middle();
void delete_last();
void display();
struct node
{
int data;
struct node* plink;
struct node* slink;
}*head=NULL,*tail=NULL,*newnode,*temp,*prev,*temp2;
void create()
{
newnode=(struct node*)malloc(sizeof(struct node));
if(newnode==NULL)
printf("Memory Error");
printf("\nEnter the data");
scanf("%d",&newnode->data);
newnode->plink=NULL;
newnode->slink=NULL;
}
void insert_first()
{
create();
if(head==NULL)
head=tail=newnode;
else
{
newnode->slink=head;
head->plink=newnode;
head=newnode;
}
}
void insert_middle()
{
int pos,i=1;
create();
printf("Enter the position to be added");
scanf("%d",&pos);
if(head==NULL)
head=tail=newnode;
else if(pos==1)
insert_first();
else
{
temp=head;
while((temp!=NULL)&&(i<pos-1))
{
temp=temp->slink;
i++;
}
newnode->slink=temp->slink;
newnode->plink=temp;
temp->slink->plink=newnode;
temp->slink=newnode;
}
}
void insert_last()
{
create();
if(head==NULL)
head=tail=newnode;
else
{
newnode->plink=tail;
tail->slink=newnode;
tail=newnode;
}
}
void delete_first()
{
if(head==NULL)
printf("\nList is empty");
else
{
temp=head;
head=head->slink;
head->plink=NULL;
free(temp);
}
}
void delete_middle()
{
int pos,i=1;
printf("Enter the position to be deleted");
scanf("%d",&pos);
if(head==NULL)
printf("List is empty");
else
{
if((pos==1)||(head->slink==NULL))
{
temp=head;
head=head->slink;
free(temp);
}
else
{
temp=head;
while((temp!=NULL)&&(i<pos-1))
{
temp=temp->slink;
i++;
}
prev=temp->slink;
temp->slink=temp->slink->slink;
temp->slink->plink=temp;
free(prev);
}
}
}
void delete_last()
{
if(head==NULL)
printf("List is empty");
else
{
temp=head;
if(temp->slink==NULL)
{
head=tail=NULL;
free(temp);
}
else
{
while(temp->slink->slink!=NULL)
{
temp=temp->slink;
prev=temp->slink;
}
temp->slink=NULL;
free(prev);
}
}
}
void display()
{
temp=head;
while(temp!=NULL)
{
printf("\t%d",temp->data);
temp=temp->slink;
}
}
void main()
{
int a;
clrscr();
while(1)
{
printf("\n1.Insert First");
printf("\n2.Insert Middle");
printf("\n3.Insert Last");
printf("\n4.Delete First");
printf("\n5.Delete Middle");
printf("\n6.Delete Last");
printf("\n7.Display");
printf("\n8.Exit");
printf("\nEnter the choice");
scanf("%d",&a);
switch(a)
{
case 1:
insert_first();
display();
break;
case 2:
insert_middle();
display();
break;
case 3:
insert_last();
display();
break;
case 4:
delete_first();
display();
break;
case 5:
delete_middle();
display();
break;
case 6:
delete_last();
display();
break;
case 7:
display();
break;
case 8:exit(0);
default:
printf("You have entered the wrong option");
exit(0);
break;
}
}
getch();
}