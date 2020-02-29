#include<bits/stdc++.h>
using namespace std;
int main(int argc, char const *argv[])
{
	int t;
	cin>>t;
	while(t)
	{
		int n,k;
		cin>>n>>k;
		int ar[n];
		for(int i=0;i<n;i++)
		{
			cin>>ar[i];
		}
		for(int i=0;i<n;i++)
		{
			int a=i%n;
			int b=n-(i%n)-1;
			ar[i]=ar[a] xor ar[b];
			cout<<ar[i]<<" ";
		}
		t--;
		cout<<"\n";
	};
	return 0;
}